<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Marca;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;


class CreateProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $name, $modelo, $ip, $mac, $stock, $image,
        $pricebuy, $pricesale, $marca, $marca_id;
    public $marcas = [];


    protected function rules()
    {
        return [
            'name' => [
                'required', 'string', 'min:3', 'unique:products,name',
            ],
            'modelo' => [
                'required', 'string', 'min:3',
            ],
            'mac' => [
                'nullable', 'string', 'min:8',
                Rule::unique('products', 'name'),
            ],
            'ip' => [
                'nullable', 'string', 'min:7',
            ],
            'pricebuy' => [
                'nullable', 'numeric', 'decimal:0,2', 'min:0',
            ],
            'stock' => [
                'required', 'numeric', 'decimal:0,2', 'min:0',
            ],
            'marca_id' => ['required', 'integer', 'min:1', 'exists:marcas,id'],
            'image' => [
                'nullable', 'file', 'mimes:jpeg,png,gif', 'max:5120'
            ],
        ];
    }

    public function mount()
    {
        $this->marcas = Marca::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.products.create-product');
    }

    public function save()
    {

        $this->name = mb_strtoupper(trim($this->name), "UTF-8");
        $validatedata = $this->validate();

        DB::beginTransaction();
        try {
            $imageURL = null;
            if ($this->image) {
                if (!Storage::directoryExists('images/products/')) {
                    Storage::makeDirectory('images/products/');
                }

                $compressedImage = Image::make($this->image->getRealPath())
                    ->orientate()->encode('jpg', 30);

                $imageURL = uniqid('product_') . '.' . $this->image->getClientOriginalExtension();
                $compressedImage->save(public_path('storage/images/products/' . $imageURL));
                // dd($imageURL);
                if ($compressedImage->filesize() > 1048576) { //1MB
                    $compressedImage->destroy();
                    $compressedImage->delete();
                    $this->addError('image', 'La imagen excede el tamaño máximo permitido.');
                    return false;
                }
            }

            $product = Product::create([
                'name' => $this->name,
                'modelo' => $this->modelo,
                'mac' => $this->mac,
                'ip' => $this->ip,
                'pricebuy' => $this->pricebuy,
                'stock' => $this->stock,
                'marca_id' => $this->marca_id,
                'image' => $imageURL,
            ]);

            DB::commit();
            $this->resetValidation();
            $this->reset();
            $this->emitTo('admin.products.show-products', 'render');
            $this->dispatchBrowserEvent('toast', toastJson('Producto registrado correctamente'));
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function savemarca()
    {
        $this->marca = trim(mb_strtoupper($this->marca, "UTF-8"));
        $validatedata = $this->validate([
            'marca' => ['required', 'string', 'min:2', 'unique:marcas,name']
        ]);

        DB::beginTransaction();
        try {
            $marca = Marca::create([
                'name' => $this->marca
            ]);
            DB::commit();
            $this->resetValidation();
            $this->reset(['marca']);
            $this->marcas = Marca::orderBy('name', 'asc')->get();
            $this->marca_id = $marca->id;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar cliente de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function clearImage()
    {
        $this->reset(['image']);
        $this->resetValidation();
    }

    public function updatedImage($file)
    {
        try {
            $url = $file->temporaryUrl();
        } catch (\Exception $e) {
            $this->reset(['image']);
            $this->addError('image', $e->getMessage());
            return;
        }
    }
}

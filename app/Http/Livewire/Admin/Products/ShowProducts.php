<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Marca;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic as Image;


class ShowProducts extends Component
{

    use WithPagination, WithFileUploads;

    protected $listeners = ['render'];

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'buscar'],
        'searchmarca' => ['except' => '', 'as' => 'marca'],
    ];

    public $product, $image, $marca;
    public $marcas = [];
    public $open = false;

    public $search = '', $searchmarca = '';

    protected function rules()
    {
        return [
            'product.name' => [
                'required', 'string', 'min:3',
                Rule::unique('products', 'name')->ignore($this->product->id),
            ],
            'product.modelo' => [
                'required', 'string', 'min:3',
            ],
            'product.mac' => [
                'nullable', 'string', 'min:8', 'unique:products,name',
            ],
            'product.ip' => [
                'nullable', 'string', 'min:7',
            ],
            'product.pricebuy' => [
                'nullable', 'numeric', 'decimal:0,2', 'min:0',
            ],
            'product.stock' => [
                'required', 'numeric', 'decimal:0,2', 'min:0',
            ],
            'product.marca_id' => ['required', 'integer', 'min:1', 'exists:marcas,id'],
            'image' => [
                'nullable', 'file', 'mimes:jpeg,png,gif', 'max:5120'
            ],
        ];
    }

    public function mount()
    {
        $this->product = new Product();
        $this->marcas = Marca::orderBy('name', 'asc')->get();
    }

    public function render()
    {

        $products = Product::with('marca')->orderBy('name', 'asc');

        if (trim($this->search) != '') {
            $products->where('name', 'like', '%' . $this->search . '%');
        }

        if (trim($this->searchmarca) != '') {
            $products->where('marca_id', 'like', '%' . $this->searchmarca . '%');
        }

        $products = $products->paginate();
        return view('livewire.admin.products.show-products', compact('products'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSearchmarca()
    {
        $this->resetPage();
    }

    public function edit(Product $product)
    {
        // $this->resetExcept(['product', 'marcas']);
        $this->resetValidation();
        $this->product = $product;
        $this->open = true;
    }

    public function update()
    {

        $this->product->name = mb_strtoupper(trim($this->product->name), "UTF-8");
        $this->validate();
        DB::beginTransaction();
        try {

            if ($this->image) {
                $compressedImage = Image::make($this->image->getRealPath())
                    ->orientate()->encode('jpg', 30);

                $imageURL = uniqid('product_') . '.' . $this->image->getClientOriginalExtension();
                $compressedImage->save(public_path('storage/images/products/' . $imageURL));

                if ($compressedImage->filesize() > 1048576) { //1MB
                    $compressedImage->destroy();
                    $compressedImage->delete();
                    $this->addError('image', 'La imagen excede el tamaño máximo permitido.');
                    return false;
                }

                if ($this->product->image) {
                    Storage::delete('images/products/' . $this->product->image);
                    $this->product->image = null;
                }

                $this->product->image = $imageURL;
            }

            $this->product->save();
            DB::commit();
            $this->resetValidation();
            $this->resetExcept(['product', 'marcas']);
            $this->dispatchBrowserEvent('toast', toastJson('Producto actualizado correctamente'));
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
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

    public function deleteimage()
    {
        if ($this->product->image) {
            Storage::delete('images/products/' . $this->product->image);
            $this->product->image = null;
            $this->product->save();
            $this->product->refresh();
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
            // $this->marca_id = $marca->id;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar cliente de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function delete(Product $product)
    {
        $product->delete();
        $this->dispatchBrowserEvent('toast', toastJson('Producto eliminado correctamente'));
    }
}

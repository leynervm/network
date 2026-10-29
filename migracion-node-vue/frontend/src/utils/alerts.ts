import Swal from 'sweetalert2';

const ToastMixin = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer);
    toast.addEventListener('mouseleave', Swal.resumeTimer);
  },
});

export function toast(title: string, icon: 'success' | 'error' | 'warning' | 'info' | 'question' = 'success') {
  return ToastMixin.fire({
    icon,
    title,
  });
}

export function alert(title: string, text: string, icon: 'success' | 'error' | 'warning' | 'info' | 'question' = 'success') {
  return Swal.fire({
    title,
    text,
    icon,
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'CERRAR',
    allowEscapeKey: true,
  });
}

export async function confirmDialog(title: string, text: string, confirmButtonText: string = 'SÍ, ELIMINAR') {
  return Swal.fire({
    title,
    text,
    icon: 'question',
    showCancelButton: true,
    allowOutsideClick: false,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText,
    cancelButtonText: 'CANCELAR',
  });
}

export function alertCustom(options: any) {
  return Swal.fire(options);
}


// Fungsi untuk menampilkan pesan SweetAlert
function showAlert(type, message) {
  Swal.fire({
    icon: type,
    title: message,
    showConfirmButton: false,
    timer: 1500
  });
}
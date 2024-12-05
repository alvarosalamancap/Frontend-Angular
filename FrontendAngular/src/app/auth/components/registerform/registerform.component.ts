import { Component } from '@angular/core';

@Component({
  selector: 'app-register-form',
  templateUrl: './registerform.component.html',
  styleUrls: ['./registerform.component.css']
})
export class RegisterFormComponent {
  showModal = false;
  showSuccessModal = false;
  buttonColor = '#c19875'; // Color inicial del botón "Registrar"
  hoverBackButton = false; // Variable para manejar el hover en el botón "Volver"

  // Cambia el color del botón cuando se pasa el ratón
  changeButtonColor(color: string) {
    this.buttonColor = color;
  }

  // Abre el modal de confirmación
  openModal() {
    this.showModal = true;
  }

  // Cierra el modal de confirmación
  closeModal() {
    this.showModal = false;
  }

  // Confirma el registro y muestra el modal de éxito
  confirmRegistration() {
    this.showModal = false;
    this.showSuccessModal = true;
  }

  // Cierra el modal de éxito
  closeSuccessModal() {
    this.showSuccessModal = false;
  }
}

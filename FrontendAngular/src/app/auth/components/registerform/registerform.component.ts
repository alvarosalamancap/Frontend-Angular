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

  openModal() {
    this.showModal = true;
  }

  closeModal() {
    this.showModal = false;
  }

  confirmRegistration() {
    this.showModal = false;
    this.showSuccessModal = true;
  }

  closeSuccessModal() {
    this.showSuccessModal = false;
  }
}

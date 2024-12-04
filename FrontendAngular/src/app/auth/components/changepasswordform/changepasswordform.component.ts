import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-changepasswordform',
  templateUrl: './changepasswordform/changepasswordform.component.html',
  styleUrls: ['./changepasswordform.component.css']
})
export class ChangePasswordFormComponent {
  passwordForm: FormGroup;
  errorMessage: string | null = null;

  constructor(private fb: FormBuilder) {
    this.passwordForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      currentPassword: ['', Validators.required],
      newPassword: ['', [Validators.required, Validators.pattern(/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/)]],
      confirmPassword: ['', Validators.required]
    });
  }

  onSubmit() {
    if (this.passwordForm.value.newPassword !== this.passwordForm.value.confirmPassword) {
      this.errorMessage = 'Las contraseñas no coinciden.';
    } else {
      this.errorMessage = null;
      alert('Contraseña cambiada exitosamente.');
    }
  }
}

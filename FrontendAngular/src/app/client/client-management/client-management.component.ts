import { Component } from '@angular/core';

@Component({
  selector: 'app-client-management',
  standalone: true,
  imports: [],
  templateUrl: './client-management.component.html',
  styleUrl: './client-management.component.css'
})
export class ClientManagementComponent {
 // Agrega cualquier lógica para manejar acciones aquí
 handleAction(action: string, cliente: string): void {
  console.log(`${action} cliente: ${cliente}`);
  
}
}

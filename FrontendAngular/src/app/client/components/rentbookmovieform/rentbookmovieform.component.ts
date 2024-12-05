import { Component } from '@angular/core';

@Component({
  selector: 'app-rentbookmovieform',
  templateUrl: './rentbookmovieform.component.html',
  styleUrls: ['./rentbookmovieform.component.css']
})
export class RentBookMovieFormComponent {
  searchQuery: string = '';
  searchResults: any[] = []; // Simula resultados de búsqueda
  selectedItem: any = null;
  rentalDays: number = 0;
  totalCost: string = '';
  costPerDay: number = 2000; // Ejemplo: $2000 por día

  // Simula una búsqueda
  onSearch() {
    this.searchResults = [
      { title: 'Libro A', author: 'Autor A', availability: 'Disponible', date: '2021', reviews: '4.5 estrellas' },
      { title: 'Película B', author: 'Director B', availability: 'Disponible', date: '2020', reviews: '4.7 estrellas' },
      // Más resultados simulados
    ];
  }

  // Selecciona un ítem
  selectItem(item: any) {
    this.selectedItem = item;
  }

  // Calcula el costo total
  calculateTotalCost() {
    const days = this.rentalDays || 0;
    this.totalCost = `$${days * this.costPerDay}`;
  }

  // Confirma el arriendo
  confirmRental() {
    if (this.selectedItem && this.rentalDays > 0) {
      alert(`Solicitud confirmada. El costo total es ${this.totalCost}`);
    } else {
      alert('Por favor complete todos los campos antes de confirmar.');
    }
  }
}

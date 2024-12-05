import { ComponentFixture, TestBed } from '@angular/core/testing';
import { FormsModule } from '@angular/forms'; // Importa FormsModule
import { RentBookMovieFormComponent } from './rentbookmovieform.component'; // Importa el componente

describe('RentBookMovieFormComponent', () => {
  let component: RentBookMovieFormComponent;
  let fixture: ComponentFixture<RentBookMovieFormComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [RentBookMovieFormComponent], // Declara el componente
      imports: [FormsModule] // Importa FormsModule para manejar [(ngModel)]
    }).compileComponents();

    fixture = TestBed.createComponent(RentBookMovieFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should calculate total cost correctly', () => {
    component.rentalDays = 5;
    component.calculateTotalCost();
    expect(component.totalCost).toBe('$10000'); // 5 días * $2000
  });

  it('should return search results', () => {
    component.onSearch();
    expect(component.searchResults.length).toBeGreaterThan(0);
  });
});

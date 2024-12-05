import { ComponentFixture, TestBed } from '@angular/core/testing';
import { FormsModule } from '@angular/forms'; // Necesario para [(ngModel)]
import { RegisterFormComponent } from './registerform.component';

describe('RegisterFormComponent', () => {
  let component: RegisterFormComponent;
  let fixture: ComponentFixture<RegisterFormComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [RegisterFormComponent], // Declara el componente
      imports: [FormsModule] // Importa FormsModule para soportar [(ngModel)]
    }).compileComponents();

    fixture = TestBed.createComponent(RegisterFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should toggle modal visibility', () => {
    component.openModal();
    expect(component.showModal).toBeTrue();

    component.closeModal();
    expect(component.showModal).toBeFalse();
  });

  it('should handle button hover', () => {
    component.buttonColor = '#c19875';
    component.openModal();
    expect(component.showModal).toBeTrue();
  });
});

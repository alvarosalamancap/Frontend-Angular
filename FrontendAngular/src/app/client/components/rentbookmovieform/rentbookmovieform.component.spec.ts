import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RentbookmovieformComponent } from './rentbookmovieform.component';

describe('RentbookmovieformComponent', () => {
  let component: RentbookmovieformComponent;
  let fixture: ComponentFixture<RentbookmovieformComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RentbookmovieformComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(RentbookmovieformComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

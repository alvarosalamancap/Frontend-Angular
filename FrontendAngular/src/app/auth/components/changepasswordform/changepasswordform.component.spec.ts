import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ChangepasswordformComponent } from './changepasswordform.component';

describe('ChangepasswordformComponent', () => {
  let component: ChangepasswordformComponent;
  let fixture: ComponentFixture<ChangepasswordformComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ChangepasswordformComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ChangepasswordformComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

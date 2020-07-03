import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CitiesDetailsComponent } from './cities-details.component';

describe('CitiesDetailsComponent', () => {
  let component: CitiesDetailsComponent;
  let fixture: ComponentFixture<CitiesDetailsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CitiesDetailsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CitiesDetailsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

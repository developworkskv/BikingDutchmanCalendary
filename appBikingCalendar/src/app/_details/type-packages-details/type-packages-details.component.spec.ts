import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TypePackagesDetailsComponent } from './type-packages-details.component';

describe('TypePackagesDetailsComponent', () => {
  let component: TypePackagesDetailsComponent;
  let fixture: ComponentFixture<TypePackagesDetailsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TypePackagesDetailsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TypePackagesDetailsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

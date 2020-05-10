import { TestBed } from '@angular/core/testing';

import { TypePackagesService } from './type-packages.service';

describe('TypePackagesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: TypePackagesService = TestBed.get(TypePackagesService);
    expect(service).toBeTruthy();
  });
});

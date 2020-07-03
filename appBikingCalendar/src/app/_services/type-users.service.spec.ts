import { TestBed } from '@angular/core/testing';

import { TypeUsersService } from './type-users.service';

describe('TypeUsersService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: TypeUsersService = TestBed.get(TypeUsersService);
    expect(service).toBeTruthy();
  });
});

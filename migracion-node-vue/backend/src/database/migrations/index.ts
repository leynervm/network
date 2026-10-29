import { InitialDatabaseMigration1710000000000 } from './1710000000000-InitialDatabaseMigration.js';
import { MakeNetworksDescripcionNullable1710000000001 } from './1710000000001-MakeNetworksDescripcionNullable.js';
import { AddTypelocalToNetworks1710000000002 } from './1710000000002-AddTypelocalToNetworks.js';

export const AllMigrations = [
  InitialDatabaseMigration1710000000000,
  MakeNetworksDescripcionNullable1710000000001,
  AddTypelocalToNetworks1710000000002,
];

export {
  InitialDatabaseMigration1710000000000,
  MakeNetworksDescripcionNullable1710000000001,
  AddTypelocalToNetworks1710000000002,
};


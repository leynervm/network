"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.AddTypelocalToNetworks1710000000002 = exports.MakeNetworksDescripcionNullable1710000000001 = exports.InitialDatabaseMigration1710000000000 = exports.AllMigrations = void 0;
const _1710000000000_InitialDatabaseMigration_js_1 = require("./1710000000000-InitialDatabaseMigration.js");
Object.defineProperty(exports, "InitialDatabaseMigration1710000000000", { enumerable: true, get: function () { return _1710000000000_InitialDatabaseMigration_js_1.InitialDatabaseMigration1710000000000; } });
const _1710000000001_MakeNetworksDescripcionNullable_js_1 = require("./1710000000001-MakeNetworksDescripcionNullable.js");
Object.defineProperty(exports, "MakeNetworksDescripcionNullable1710000000001", { enumerable: true, get: function () { return _1710000000001_MakeNetworksDescripcionNullable_js_1.MakeNetworksDescripcionNullable1710000000001; } });
const _1710000000002_AddTypelocalToNetworks_js_1 = require("./1710000000002-AddTypelocalToNetworks.js");
Object.defineProperty(exports, "AddTypelocalToNetworks1710000000002", { enumerable: true, get: function () { return _1710000000002_AddTypelocalToNetworks_js_1.AddTypelocalToNetworks1710000000002; } });
exports.AllMigrations = [
    _1710000000000_InitialDatabaseMigration_js_1.InitialDatabaseMigration1710000000000,
    _1710000000001_MakeNetworksDescripcionNullable_js_1.MakeNetworksDescripcionNullable1710000000001,
    _1710000000002_AddTypelocalToNetworks_js_1.AddTypelocalToNetworks1710000000002,
];

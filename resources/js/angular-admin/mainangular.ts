import 'core-js/es/reflect';
import 'fs';
import 'polyfill';
import 'zone.js';

import { platformBrowserDynamic } from "@angular/platform-browser-dynamic";
import { MainModule } from "./mainmodule";

platformBrowserDynamic().bootstrapModule(MainModule).catch(err => console.log(err));

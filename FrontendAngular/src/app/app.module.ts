import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms'; // Necesario para ngModel
import { RouterModule } from '@angular/router'; // Rutas necesarias

import { AppComponent } from './app.component';
import { RentBookMovieFormComponent } from './client/components/rentbookmovieform/rentbookmovieform.component';

@NgModule({
  declarations: [
    AppComponent,
    RentBookMovieFormComponent // Declaración del componente
  ],
  imports: [
    BrowserModule,
    FormsModule, // Soporte para formularios
    RouterModule.forRoot([ // Configuración de rutas
      { path: '', redirectTo: 'rentbook', pathMatch: 'full' },
      { path: 'rentbook', component: RentBookMovieFormComponent }
    ])
  ],
  providers: [],
  bootstrap: [AppComponent] // Bootstrap inicial
})
export class AppModule {}

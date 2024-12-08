import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms'; // Necesario para ngModel
import { RouterModule } from '@angular/router'; // Rutas necesarias
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { RentBookMovieFormComponent } from './client/components/rentbookmovieform/rentbookmovieform.component';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule // Asegúrate de que esté aquí
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms'; // Necesario para ngModel
import { RouterModule } from '@angular/router'; // Rutas necesarias
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { RentBookMovieFormComponent } from './client/components/rentbookmovieform/rentbookmovieform.component';
//import { ClientManagementComponent } from './client-management/client-management.component';


@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule // Asegúrate de que esté aquí
    RouterModule // Asegúrate de incluirlo aquí
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
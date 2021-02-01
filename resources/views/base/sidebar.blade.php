<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">

      <h5 class="logo-text"> @yield('',config('app.name'))</h5>

    </div>
    <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">PARAMETRES</li>
     <li>
       <a href="{{ url('/home') }}" class="waves-effect">
         <i class="icon-home"></i> <span>HOME</span>
       </a>

     </li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-car"></i>
         <span>VEHICULES</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">


         <li><a href="{{url('categories')}}"><i class="fa fa-circle-o"></i>CATEGORIE</a></li>


         <li><a href="{{url('marque_modeles')}}"><i class="fa fa-circle-o"></i>MARQUE & MODELE</a></li>

         <li><a href="{{url('vehicules')}}"><i class="fa fa-circle-o"></i>VEHICULES</a></li>

       </ul>
     </li>
      <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-university"></i>
         <span>MISSIONS</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">


         <li><a href="{{url('chauffeurs')}}"><i class="fa fa-circle-o"></i>CHAUFFEURS</a></li>


         <li><a href="{{url('societes')}}"><i class="fa fa-circle-o"></i>SOCIETES</a></li>

         <li><a href="{{url('missions')}}"><i class="fa fa-circle-o"></i>MISSIONS</a></li>

       </ul>
     </li>

     <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-users"></i>
          <span>FOURNISSEURS</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{url('fournisseurs')}}"><i class="fa fa-circle-o"></i> FOURNISSEURS</a></li>

        </ul>
      </li>

    


     
   </ul>

   <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">CONSOMMATIONS & LOCATIONS</li>
     
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-edit"></i>
         <span>CHARGES</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">


         <li><a href="{{url('type_documents')}}"><i class="fa fa-circle-o"></i>TYPE DE DOCUMENTS</a></li>

         <li><a href="{{url('documents')}}"><i class="fa fa-circle-o"></i>DOCUMENTS</a></li>

         <li><a href="{{url('carburants')}}"><i class="fa fa-circle-o"></i>CARBURANTS</a></li>

      
       </ul>
     </li>

     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-edit"></i>
         <span>PANNES</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">


         <li><a href="{{url('pieces')}}"><i class="fa fa-circle-o"></i>PIECES</a></li>

         <li><a href="{{url('reparations')}}"><i class="fa fa-circle-o"></i>REPARATIONS</a></li>

      
       </ul>
     </li>
    
     <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-edit"></i>
          <span>LOCATIONS</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{url('locations')}}"><i class="fa fa-circle-o"></i> LOCATIONS</a></li>

        </ul>
      </li>

    


     
   </ul>

  </div>

<section id="header">
    <!-- Navbar Starts -->
    <nav class="navbar navbar-light" data-spy="affix" data-offset-top="50">
      <div class="container">
        <button class='navbar-toggler hidden-md-up pull-xs-right' data-target='#main-menu' data-toggle='collapse' type='button'>
          ☰
        </button>
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="themes/engage/assets/img/logo.png" alt="">
        </a>
        <div class="collapse navbar-toggleable-sm pull-xs-left pull-md-right" id="main-menu">
          <!-- Navbar Starts -->
          <ul class="nav nav-inline">
            <li class="nav-item dropdown">
              <a class="nav-link active" href="{{ route('home') }}" role="button" aria-haspopup="true" aria-expanded="false">Home</a>                  
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Contact Us
              </a>
              <div class="dropdown-menu">                      
                <a class="dropdown-item" href="contact1.html">Contact us 1</a>
                <a class="dropdown-item" href="contact2.html">Contact us 2</a>
              </div> 
            </li>          
            <!-- Search in right of nav -->
            <li class="nav-item" class="search">
              <form class="top_search clearfix">
                <div class="top_search_con">
                  <input class="s" placeholder="Search Here ..." type="text">
                  <span class="top_search_icon"><i class="icon-magnifier"></i></span>
                  <input class="top_search_submit" type="submit">
                </div>
              </form>
            </li>
            <!-- Search Ends -->                  

            <li class="nav-item dropdown">
              <a class="nav-link active" href="{{ url('teacher/login') }}" role="button" aria-haspopup="true" aria-expanded="false">Teacher Login</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link active" href="{{ url('student/login') }}" role="button" aria-haspopup="true" aria-expanded="false">Student Login</a>                  
            </li>

          </ul>  
        </div>              
          <!-- Form for navbar search area -->
          <form class="full-search">
            <div class="container">
              <input type="text" placeholder="Type to Search">
              <a href="#" class="close-search">
                <span class="fa fa-times fa-2x">
                </span>
              </a>
            </div>
          </form>
          <!-- Search form ends -->
      </div>
    </nav>
    <!-- Navbar Ends -->
</section>
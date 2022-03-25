<div class="br-logo"><a href=""><span>[</span>E - <i>commerce</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{route('admin.dashboard')}}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Products</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('product.manage')}}" class="sub-link">All Products</a></li>
            <li class="sub-item"><a href="{{route('product.create')}}" class="sub-link">New Product</a></li>
            
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Orders <sup style='background:red;padding:2px 5px;font-size:10px;margin-top:-10px;border-radius:10px;color:white;'>
            {{ App\Models\Order::where('status',0)->count() }}
           
            </sup> </span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('order.manage')}}" class="sub-link">All Order</a></li>
            <li class="sub-item"><a href="#" class="sub-link">New Product</a></li>
            
          </ul>
        </li><!-- br-menu-item -->
       
       
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Categorys</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('category.manage')}}" class="sub-link">Categorys</a></li>
            <li class="sub-item"><a href="{{route('category.create')}}" class="sub-link">New Category</a></li>
          </ul>
        </li>
        
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
            <span class="menu-item-label">Brands</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('brand.manage')}}" class="sub-link">Brands</a></li>
            <li class="sub-item"><a href="{{route('brand.create')}}" class="sub-link">New Brand</a></li>
            
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Colors</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('color.manage')}}" class="sub-link">Colors</a></li>
            <li class="sub-item"><a href="{{route('color.create')}}" class="sub-link">New Color</a></li>
            
          </ul>
        </li><!-- br-menu-item -->
       
        <!-- Location  -->
        <label class="sidebar-label pd-x-10 mg-t-15 mg-b-15 tx-info">Location Summary</label>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Cuntrys</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('cuntry.manage')}}" class="sub-link">Cuntrys</a></li>
            <li class="sub-item"><a href="{{route('cuntry.create')}}" class="sub-link">New Cuntry</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Divisions</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('division.manage')}}" class="sub-link">Divisions</a></li>
            <li class="sub-item"><a href="{{route('division.create')}}" class="sub-link">New Division</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Districts</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('district.manage')}}" class="sub-link">Districts</a></li>
            <li class="sub-item"><a href="{{route('district.create')}}" class="sub-link">New District</a></li>
          </ul>
        </li><!-- br-menu-item -->
       
       
        
      </ul><!-- br-sideleft-menu -->

      <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label>
      <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
          <i class="icon ion-person-stalker ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">User</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('user.manage')}}" class="sub-link">Users</a></li>
          </ul>
        </li><!-- br-menu-item -->

        <div class="my-5 text-center"><a href="{{route('home')}}" class='btn btn-info btn-sm'>Website view</a></div class="my-5 text-center">
     
      <br>
    </div><!-- br-sideleft -->
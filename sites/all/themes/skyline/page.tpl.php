<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

   

    <?php print render($page['header']); ?>

 <div id="main-main-menu">
          <?php
          $output = '<ul>';
          $menus = menu_tree('Main-menu');
          global $base_url;
    	$url = 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI'] == $base_url.'/' ?$base_url:'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI'];


          foreach ($menus as $menu) {
            if (!empty($menu['#original_link']['link_path'])) {
                $menu_tree = '';
 	   	$child_menus = db_query('select * from {menu_links} where plid ='.$menu['#original_link']['mlid']);
		$child_name = '';
		foreach($child_menus as $child_menu){
	                   $menu_tree_tree = '';
                           //$child_child_name="";
                           //$child_child_menus = db_query('select * from {menu_links} where plid ='.$child_menu->mlid);
                           //foreach ($child_child_menus as $child_child_menu){

                                   //if($child_child_menu!=null){
                                //$child_child_name .= '<li><a  href="/'.($child_child_menu->link_path=='<front>'?'/':$child_child_menu->link_path).'">'.$child_child_menu->link_title.'</a></li>';
                                    // }
                           // }
                             //if($child_child_name ==''){
		               //$menu_tree_tree = '';
		            // }else{
                                //$menu_tree_tree = '<div class="menu_tree_tree"><ul>'.$child_child_name.'</ul></div>';
		              //}
			if($child_menu!=null){
                            $child_name .= '<li><a  href="/'.$child_menu->link_path.'">'.$child_menu->link_title.'</a>'.$menu_tree_tree.'</li>';
			}
                     
		}
		if($child_name ==''){
		 $menu_tree = '';
		}else{
                 $menu_tree = '<div class="menu_tree"><ul>'.$child_name.'</ul></div>';
		}

              $path = $menu['#original_link']['link_path'] == '<front>' ? $base_url  : $base_url.'/' . $menu['#original_link']['link_path'];


		if($path== $url){ 
			$activte = 'activte';
		}else{
			$activte = '';
		}

              $output .= '<li><a class="'.$activte.'"  href="' . $path . '">' . $menu['#original_link']['link_title'] . '</a>' . $menu_tree . '</li>';
              
                        
            }

          }
          print $output . '</ul>';
          ?>

        </div>
  <?php  
   global $user;

  ?>

   <div id="login_register" > 
    <ul>
    <li><a class="hide_menu" title="Hide navigation" href="#"> Menu <br> <i class="icon-list icon-2x"></i></a></li>
    <li  class="menu first"> <a href="/user"><?php echo $user->uid==0?'Login':'My account' ?>  <br><i class="icon-signin icon-2x"></a></i></li>
    <li  class="menu last"> <a href="<?php echo $user->uid ==0?'/user/register':'/user/logout' ?>"><?php echo $user->uid ==0 ?'Register':'Logout' ?><br><i class="icon-user icon-2x"></i></a> </li>
    </ul>

   </div> 
<!--

<div id="menus-2" > 
    <ul id="menus-2-2">
    <li  class="menu-2 first" > <a href="user">  My account </a></li>
    <li  class="menu-15 last"> <a href="user/logout">  Logout</a></li>
    </ul>
     <div id="for-icon-2">
    <a href="user"> <i class="icon-user icon-2x"></i></a>
    <a href="user/logout"> <i class="icon-signout icon-2x"></i></a>
     </div>
   </div>
-->

  </div></div> <!-- /.section, /#header -->


  <?php if($page['banner']):  ?>
    <div id="banner"><div class="section clearfix">
	<?php print render($page['banner']); ?>	
    </div></div>
  <?php endif;?>

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix "><div class="section page-content" class="clearfix">



    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar">
        <?php print render($page['sidebar_first']); ?>
      </div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column tab-content">
	<?php if($tabs): ?>
	  <div class="tabs">
 	<?php  print render($tabs) ;?>
	 </div>
	<?php endif ; ?>
  <h2 class="page-title"><?php print $title; ?></h2>

	<?php print render($page['content']); ?>

    </div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar">
        <?php print render($page['sidebar_second']); ?>
      </div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

 </div> </div></div> <!-- /#main, /#main-wrapper -->

 

  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->

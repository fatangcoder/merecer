<li><!-- NEWIN  li tarts -->

<a href="#" data-toggle="collapse" data-target="#newin">

<i class="fa fa-fw fa-gear"></i> NEwin

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="newin" class="collapse">

<li>
<a href="index.php?insert_newin"> Insert newin </a>
</li>

<li>
<a href="index.php?view_newin"> View newin products </a>
</li>

</ul>

</li>


if(isset($_GET['insert_newin'])){

include("insert_newin.php");

}

if(isset($_GET['view_newin'])){

include("view_newin.php");

}
if(isset($_GET['edit_newin'])){

include("edit_newin.php");

}
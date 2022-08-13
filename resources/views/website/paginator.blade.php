@php
$totalPages = ceil($paginator->total() / $paginator->perPage());
@endphp 
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?page={{$paginator->currentPage()-1 < 1? 1:$paginator->currentPage()-1 }}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @for($i=1; $i<=$totalPages ;$i++)
            @if($totalPages>5)
                @if( $i == 1)	    
                    <li class="page-item @if($i == $paginator->currentPage()) active @endif" ><a class="page-link"  href="?page=1">1</a></li>
                @endif

                @if($i ==2 && $paginator->currentPage() >2 )
                    <li class="page-item "><a class="page-link" href="#" >...</a></li>
                @endif
                
                @if( $i != 1 &&  $i != $totalPages && ($i == $paginator->currentPage() ||$i == $paginator->currentPage()+1 ||  $i == $paginator->currentPage()-1) )
                <li class="page-item @if($i == $paginator->currentPage()) active @endif"><a class="page-link" href="?page={{$i}}" >{{$i}}</a></li>
                @endif

                @if(  $i+1 > $totalPages && $paginator->currentPage()+1 < $totalPages)
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                @endif
                
                @if( $i == $totalPages && $paginator->currentPage()!= $totalPages )	    
                    <li class="page-item @if($i == $paginator->currentPage()) active @endif"><a class="page-link" href="?page={{$totalPages}}" >الأخير</a></li>
                @endif
                @if( $i == $totalPages && $paginator->currentPage()== $totalPages )	    
                    <li class="page-item  @if($i == $paginator->currentPage()) active @endif"><a class="page-link" href="?page={{$totalPages}}" >{{$i}}</a></li>
                @endif
            @else
                <li class="page-item @if($i == $paginator->currentPage()) active @endif"><a class="page-link  " href="?page={{$i}}" >{{$i}}</a></li>
            @endif
        @endfor    
        <li class="page-item">
            <a class="page-link" href="?page={{$paginator->currentPage()+1 > $totalPages? $totalPages :$paginator->currentPage()+1}}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
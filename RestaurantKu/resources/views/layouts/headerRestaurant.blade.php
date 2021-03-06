<div style="grid-template-columns: 1fr 3fr 1fr" class="grid items-center grid-cols-3 bg-green-400 shadow-xl ">
    <div class="flex justify-center text-xl font-extrabold text-green-600">
        <a href="">RestoranKu</a>
    </div>
    <div class="flex flex-row justify-around font-extrabold text-white">
        <a class="text-xl " href="/Restaurant/Menu">Menu</a>
        <a class="text-xl " href="/Restaurant/Transaction">Transaction</a>
    </div>
    <div>
        <a class="flex items-center justify-center text-green-200" href="/logout">
            <span style="font-size: 3em; margin-right: 20px;color: black">
                <i class="fas fa-user-circle"></i>
            </span>
            @php
                if (session_status() === PHP_SESSION_NONE) session_start();
            @endphp
            <div class="text-xl font-semibold text-white">{{isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser']['customer_name'] : "Guest"}}</div>
        </a>
    </div>
</div>

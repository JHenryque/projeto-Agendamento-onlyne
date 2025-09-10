<div class="d-flex justify-content-around p-2 flex-wrap">
    <div>
        <i class="fa-solid fa-user me-3"></i>{{ auth()->user()->name }}
    </div>
    <div>
        <i class="fa-solid fa-at me-3"></i>{{ auth()->user()->email }}
    </div>
    <div>
        <i class="fa-brands fa-font-awesome me-3"></i>{{ auth()->user()->empreendedor->logomarca }}
    </div>
    <div>
        <i class="fa-regular fa-calendar-days me-3"></i>{{ auth()->user()->created_at->format('d/m/y') }}
    </div>
</div>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white text-xs font-black rounded-xl transition-all duration-300 uppercase tracking-widest disabled:opacity-50 border border-rose-500/20']) }}>
    {{ $slot }}
</button>

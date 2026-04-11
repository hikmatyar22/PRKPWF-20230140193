<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-slate-700/50 hover:bg-slate-700 text-slate-300 text-xs font-black rounded-xl transition-all duration-200 uppercase tracking-widest disabled:opacity-50']) }}>
    {{ $slot }}
</button>

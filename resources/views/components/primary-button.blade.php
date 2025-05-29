<button {{ $attributes->merge([
    'type' => 'submit',
    'class' =>
        'inline-flex items-center justify-center px-6 py-2 bg-[#00008B] hover:bg-[#1E40AF] active:bg-[#1E40AF] border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wide focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 transition duration-200 ease-in-out shadow-md'
]) }}>
    {{ $slot }}
</button>

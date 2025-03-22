@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'dark:bg-white-900 dark:black focus:border-black dark:focus:black focus:black dark:black rounded-md shadow-sm']) }}>

<x-auth-layout title="connexion" :action="route('login')" submitMessage="Connexion">
    <x-input name="email" label="Adresse e-mail" type="email"/>
    <x-input name="password" label="Mot de passe" type="password"/>

    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded form-checkbox focus:ring-indigo-600">
            <label for="remember" class="block ml-3 text-sm leading-6 text-gray-900">Remember me</label>
        </div>
    </div>
</x-auth-layout>

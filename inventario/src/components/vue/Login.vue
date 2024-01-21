<template>
    <div>
      <input v-model="email" type="email" placeholder="Correo Electrónico">
      <input v-model="password" type="password" placeholder="Contraseña">
      <button @click="login">Iniciar Sesión</button>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { supabase } from '@/supabase.js'; // Asegúrate de que la ruta sea correcta
  
  const email = ref('');
  const password = ref('');
  
  const login = async () => {
    try {
      const { user, error } = await supabase.auth.signIn({
        email: email.value,
        password: password.value
      });
      if (error) throw error;
      // Aquí podrías redirigir al usuario o guardar el estado del usuario
      console.log('Usuario inició sesión:', user);
    } catch (error) {
      console.error('Error al iniciar sesión:', error.message);
    }
  };
  </script>
  
  <style>
  /* Estilos de tu componente */
  </style>
  
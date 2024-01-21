<template>
    <div>
      <input v-model="email" type="email" placeholder="Correo Electrónico">
      <input v-model="password" type="password" placeholder="Contraseña">
      <input v-model="fullName" type="text" placeholder="Nombre completo">
      <button @click="register">Registrarse</button>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { supabase } from '@/supabase.js'; // Asegúrate de que la ruta sea correcta
  
  const email = ref('');
  const password = ref('');
  const fullName = ref('');
  
  const register = async () => {
    try {
      const { user, error } = await supabase.auth.signUp({
        email: email.value,
        password: password.value,
        // Opcional: Puedes pasar 'data' adicional si tu tabla de usuarios tiene más campos
        data: {
          full_name: fullName.value
        }
      });
      if (error) throw error;
      alert('Registro exitoso. Verifica tu correo electrónico para activar la cuenta.');
      console.log('Usuario registrado:', user);
    } catch (error) {
      alert('Error en el registro:', error.message);
      console.error('Error al registrarse:', error.message);
    }
  };
  </script>
  
  <style>
  /* Estilos de tu componente */
  </style>
  
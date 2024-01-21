import { createClient } from '@supabase/supabase-js';

const supabaseUrl = 'https://vqxqfxlmxscizjjgmjkf.supabase.co'; // Reemplaza con tu URL de Supabase
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZxeHFmeGxteHNjaXpqamdtamtmIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MDQ0MzMzNzMsImV4cCI6MjAyMDAwOTM3M30.Ivkw8XPJduSXY01X-WY-7NJI3AAcsjGBBaLDOlyUtO0'; // Reemplaza con tu clave secreta de Supabase

export const supabase = createClient(supabaseUrl, supabaseKey);

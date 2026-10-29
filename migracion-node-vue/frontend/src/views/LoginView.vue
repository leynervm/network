<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '../stores/auth.js';
import { useNavStore } from '../stores/nav.js';
import { Button } from '@/components/ui/button';
import TextInput from '../components/TextInput.vue';
import InputLabel from '../components/InputLabel.vue';
import { Label } from '@/components/ui/label';
import { Checkbox } from '@/components/ui/checkbox';
import {
  Card,
  CardHeader,
  CardTitle,
  CardDescription,
  CardContent,
} from '@/components/ui/card';

const router = useRouter();
const auth = useAuthStore();
const nav = useNavStore();

const email = ref('');
const password = ref('');
const remember = ref(false);
const errorMessage = ref('');
const loading = ref(false);

async function handleLogin() {
  errorMessage.value = '';
  loading.value = true;
  try {
    await auth.login(email.value, password.value, remember.value);
    router.push('/dashboard');
  } catch (error: any) {
    errorMessage.value = error.response?.data?.message || 'Las credenciales proporcionadas no son válidas.';
  } finally {
    loading.value = false;
  }
}
</script>

<template>
  <div class="relative min-h-screen flex flex-col justify-center items-center p-4 sm:p-6 bg-muted/40 transition-colors duration-300">
    <!-- Top Navigation Bar for Guest / Login -->
    <div class="absolute top-4 right-4 sm:top-6 sm:right-6 flex items-center gap-3">
      <router-link
        to="/"
        class="text-xs font-medium text-muted-foreground hover:text-foreground transition-colors flex items-center gap-1.5 bg-background border border-border px-3 py-1.5 rounded-lg shadow-xs"
      >
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span>Volver</span>
      </router-link>

      <!-- Theme Toggle Button -->
      <Button
        @click="nav.toggleTheme()"
        type="button"
        variant="outline"
        size="sm"
        aria-label="Alternar tema claro u oscuro"
        class="h-8 w-8 p-0"
      >
        <!-- Sun Icon -->
        <svg v-if="nav.theme === 'dark'" class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <!-- Moon Icon -->
        <svg v-else class="w-4 h-4 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
      </Button>
    </div>

    <div class="relative w-full max-w-sm">
      <!-- Subtle Rotated Accents -->
      <div class="absolute inset-0 bg-muted/80 rounded-2xl shadow-sm transform -rotate-3 sm:-rotate-4 transition-all duration-300"></div>
      <div class="absolute inset-0 bg-muted rounded-2xl shadow-sm transform rotate-3 sm:rotate-4 transition-all duration-300"></div>

      <!-- Main Login Card with shadcn Card -->
      <Card class="relative w-full rounded-2xl p-5 sm:p-7 border-border shadow-xl transition-colors duration-300">
        <CardHeader class="p-0 text-center mb-5">
          <div class="w-12 h-12 mx-auto bg-primary text-primary-foreground p-2.5 rounded-xl shadow-md flex items-center justify-center transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path d="M9 22L6 15L3 22H9Z" />
              <path d="M18.1917 13.3352C19.4847 14.6282 20.1312 15.2747 19.9778 16.2732C19.9707 16.3193 19.9548 16.3994 19.9437 16.4447C19.7033 17.4259 19.0448 17.6987 17.7276 18.2443C16.5231 18.7432 15.2321 19 13.9283 19C12.6245 19 11.3334 18.7432 10.1289 18.2443C8.92433 17.7453 7.82984 17.014 6.90792 16.0921C5.986 15.1702 5.25468 14.0757 4.75574 12.8711C4.2568 11.6666 4 10.3755 4 9.07173C4 7.76794 4.2568 6.4769 4.75575 5.27235C5.30131 3.95524 5.5741 3.29668 6.55528 3.05633C6.60061 3.04523 6.68071 3.0293 6.72683 3.02221C7.72531 2.86878 8.3718 3.51527 9.66479 4.80826L18.1917 13.3352Z" />
              <circle cx="19" cy="4" r="2" />
              <path d="M12.5 7.13288L17.7134 5.5293L15.8766 10.5293" />
            </svg>
          </div>
          <CardTitle class="text-base sm:text-lg font-bold uppercase tracking-wider mt-2.5">
            Iniciar Sesión
          </CardTitle>
          <CardDescription class="text-[11px] text-muted-foreground mt-0.5">
            Acceso al Panel de Administración
          </CardDescription>
        </CardHeader>

        <CardContent class="p-0">
          <form @submit.prevent="handleLogin" class="space-y-3.5">
            <div class="space-y-1">
              <InputLabel for="email" value="E-mail" />
              <TextInput
                id="email"
                v-model="email"
                type="email"
                name="email"
                placeholder="usuario@dominio.com"
                required
                autofocus
                class="text-xs sm:text-sm h-10"
              />
            </div>

            <div class="space-y-1">
              <InputLabel for="password" value="Contraseña" />
              <TextInput
                id="password"
                v-model="password"
                type="password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
                required
                class="text-xs sm:text-sm h-10"
              />
            </div>

            <div class="flex items-center space-x-2 pt-1">
              <Checkbox
                id="remember_me"
                :checked="remember"
                @update:checked="(val: boolean) => remember = val"
              />
              <Label for="remember_me" class="text-xs font-normal text-muted-foreground cursor-pointer">
                Recordarme
              </Label>
            </div>

            <div class="pt-2">
              <div v-if="errorMessage" class="mb-3 font-medium text-xs text-destructive bg-destructive/10 p-2.5 rounded-lg border border-destructive/20">
                {{ errorMessage }}
              </div>

              <Button
                type="submit"
                :disabled="loading"
                class="w-full h-10 font-semibold text-xs sm:text-sm uppercase tracking-wider flex items-center justify-center gap-2"
              >
                <span>{{ loading ? 'Iniciando...' : 'Iniciar Sesión' }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </Button>
            </div>
          </form>
        </CardContent>
      </Card>
    </div>
  </div>
</template>

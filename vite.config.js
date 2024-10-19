import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'dist', // Thư mục đầu ra mặc định là 'dist', bạn có thể thay đổi nếu cần.
        rollupOptions: {
          output: {
            entryFileNames: 'bundle.js', // Tên file đầu ra
          }
        }
      }
});

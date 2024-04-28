// main.ts
import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { DocumentBuilder, SwaggerModule } from '@nestjs/swagger';

async function bootstrap() {
  const app = await NestFactory.create(AppModule);

  // Вызываем настройку Swagger
  AppModule.setupSwagger(app);

  await app.listen(3000);
}
bootstrap();

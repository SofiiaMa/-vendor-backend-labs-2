// app.module.ts
import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { CatsModule } from './cats/cats.module';
import { TagsModule } from './tags.module'; // Импортируем TagsModule
import { Tag } from './tag.entity'; // Импортируем сущность Tag
import { INestApplication } from '@nestjs/common'; // Импортируем тип INestApplication
import { SwaggerModule, DocumentBuilder } from '@nestjs/swagger';

@Module({
  imports: [
    TypeOrmModule.forRoot({
      // Здесь добавьте вашу конфигурацию подключения к базе данных
      type: 'postgres',
      host: 'pg',
      port: 5432,
      username: 'pguser',
      password: 'password',
      database: 'nestjs',
      entities: [Tag], // Загружаем сущность Tag
      synchronize: true,
    }),
    CatsModule,
    TagsModule,
    TypeOrmModule.forFeature([Tag]), // Загружаем сущности
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {
  // Функция для настройки Swagger
  static setupSwagger(app: INestApplication) {
    const config = new DocumentBuilder()
      .setTitle('NestJs API Documentation')
      .setDescription('Backend API for the NestJs application.')
      .setVersion('1.0')
      .addTag('Tags')
      .build();
    const document = SwaggerModule.createDocument(app, config);

    // Устанавливаем Swagger по пути /api/docs
    SwaggerModule.setup('api/docs', app, document);

    // Устанавливаем Swagger по пути /api
    // Он будет отображать документацию, как и /api/docs, но без интерфейса Swagger UI
    SwaggerModule.setup('api', app, document);
  } 
}

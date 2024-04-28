import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Tag } from './tag.entity'; // Импортируйте сущность Tag
import { TagsController } from './tags.controller';
import { TagsService } from './tags.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Tag]), // Добавьте эту строку для загрузки репозитория Tag
  ],
  controllers: [TagsController],
  providers: [TagsService],
})
export class TagsModule {}

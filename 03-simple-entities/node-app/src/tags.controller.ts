import { Controller, Get, Post, Body, Param, Put, Delete, NotFoundException } from '@nestjs/common';
import { TagsService } from './tags.service';
import { CreateTagDto, UpdateTagDto } from './dto';
import { Tag } from './tag.entity';
import { ApiBody } from '@nestjs/swagger';

@Controller('api/tags')
export class TagsController {
  constructor(private readonly tagsService: TagsService) {}

  @Get('/default')
  getDefaultFormData(): Tag {
    // Создаем объект Tag со значениями по умолчанию
    const defaultTag: Tag = {
      id: 0,
      name: '',
      description: ''
    };
    return defaultTag;
  }

  @Get()
  async findAll(): Promise<Tag[]> {
    return this.tagsService.findAll();
  }

  @Get(':id')
  async findOne(@Param('id') id: string): Promise<Tag | undefined> {
    return this.tagsService.findOne(+id);
  }


  @ApiBody({
    schema: {
      properties: {
        id: {
          type: 'number',
          example: 0,
        },
        name: {
          type: 'string',
          example: 'Default name',
        },
        description: {
          type: 'string',
          example: 'Default description',
        },
      },
    },
  })

  
  @Post()
  create(@Body() tagData: Partial<Tag>): void {
    const formData = { ...this.getDefaultFormData(), ...tagData };
    this.tagsService.create(formData);
  }

  @Put(':id')
  async update(
    @Param('id') id: string,
    @Body() updatedTagData: UpdateTagDto
  ): Promise<Tag | undefined> {
    const existingTag = await this.tagsService.findOne(+id);
    if (!existingTag) {
      throw new NotFoundException(`Tag with id ${id} not found`);
    }
    const updatedTag = await this.tagsService.update(+id, updatedTagData);
    return updatedTag;
  }

  @Delete(':id')
  delete(@Param('id') id: string): Promise<void> {
    return this.tagsService.delete(+id);
  }
}

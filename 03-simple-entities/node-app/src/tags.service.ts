// tags.service.ts
import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Tag } from './tag.entity';
import { CreateTagDto, UpdateTagDto } from './dto';

@Injectable()
export class TagsService {
  constructor(
    @InjectRepository(Tag)
    private readonly tagsRepository: Repository<Tag>,
  ) {}

  async findAll(): Promise<Tag[]> {
    return this.tagsRepository.find();
  }

  async findOne(id: number): Promise<Tag | undefined> {
    const tag: Tag | null = await this.tagsRepository.findOne({ where: { id } });
    return tag === null ? undefined : tag;
  }
  
  async create(createTagDto: CreateTagDto): Promise<Tag> {
    const newTag = this.tagsRepository.create(createTagDto);
    return this.tagsRepository.save(newTag);
  }

  async update(id: number, updateTagDto: UpdateTagDto): Promise<Tag | undefined> {
    await this.tagsRepository.update(id, updateTagDto);
    return this.findOne(id);
  }

  async delete(id: number): Promise<void> {
    await this.tagsRepository.delete(id);
  }
}

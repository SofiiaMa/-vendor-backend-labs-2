// tags.repository.ts
import { EntityRepository, Repository } from 'typeorm';
import { Tag } from './tag.entity';

@EntityRepository(Tag)
export class TagsRepository extends Repository<Tag> {
  // Дополнительные методы для работы с сущностью Tag могут быть добавлены здесь
}

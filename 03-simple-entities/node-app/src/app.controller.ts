import { Controller, Get, Res, HttpStatus } from '@nestjs/common';
import { Response } from 'express';

@Controller()
export class AppController {
  @Get()
  redirectToApi(@Res() res: Response) {
    return res.redirect(HttpStatus.MOVED_PERMANENTLY, '/api');
  }
}

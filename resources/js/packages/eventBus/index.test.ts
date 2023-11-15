import { afterEach, beforeEach, describe, expect, it, vi } from 'vitest'
import eventBus from '.';

describe('eventBus tests', () => {
  afterEach(() => {
    vi.restoreAllMocks()
  })

  it('Ao cadastrar listener, a função on deverá ser chamda', () => {
    const ev = eventBus('test');
    const s = vi.spyOn(ev, 'on')

    ev.on(() => {})

    expect(s).toHaveBeenCalledTimes(1)
  });

  it('Ao emitir um evento, a função cadastrada em on deverá ser invocada', () => {
    const ev = eventBus('test');

    const mockFn = vi.fn();
    ev.on(mockFn);

    ev.emit('test');

    expect(mockFn).toBeCalled()
  });

  it('Ao emitir um evento com argumentos, esses deverão ser enviados para o listener cadastrado', () => {
    const mockFn = vi.fn();

    const ev = eventBus('test');
    ev.on(mockFn);

    ev.emit('Your Name');

    expect(mockFn).toBeCalledWith('Your Name')
  });

  it('Ao emitir um evento, todos os listeners deverão ser executados', () => {
    const mockFn1 = vi.fn();
    const mockFn2 = vi.fn();

    const ev = eventBus('test');
    ev.on(mockFn1);
    ev.on(mockFn2);

    ev.emit('Your Name');

    expect(mockFn1).toBeCalledTimes(1)
    expect(mockFn2).toHaveBeenCalledWith('Your Name')
  });

  it ('Ao emitir um evento, apenas listenrs do evento cadastro deverão ser invocados', () => {
    const mockFn = vi.fn();

    const evFirst = eventBus('first');
    const evSecond = eventBus('second');

    evFirst.on(mockFn);
    evSecond.on(mockFn);

    evFirst.emit();

    expect(mockFn).toBeCalledTimes(1);
  });

  it ('Após descadastrar o listener, ele não deverá ser invocado', () => {
    const mockFn = vi.fn();

    const ev = eventBus('test');
    ev.on(mockFn);
    ev.off(mockFn);

    ev.emit();

    expect(mockFn).not.toBeCalled();
  });
})

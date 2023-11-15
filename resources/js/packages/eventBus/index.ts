const events = new Map<string, Set<any>>()

export type EventBusListener<T = unknown, P = any> = (event: T, payload: P) => void;

export default <T = unknown, P = any>(key: string) => {

  function on(listener: EventBusListener<T, P>) {
    const listeners = _getListeners();
    listeners.add(listener)

    _saveListeners(listeners);
  }

  function off(listener: EventBusListener<T, P>) {
    const listeners = _getListeners();
    listeners.delete(listener);

    _saveListeners(listeners);
  }

  function emit(...args: P[]) {
    if (!events.has(key)) return;

    events.get(key)?.forEach(c => c(...args));
  }

  function _getListeners() {
    return events.get(key) || new Set();
  }

  function _saveListeners(listeners) {
    events.set(key, listeners);
  }

  return { on, off, emit }
};

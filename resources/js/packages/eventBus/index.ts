const events = new Map<string|symbol, Set<any>>()

export type EventBusListener = Function;

export default <T = unknown, P = any>(key: string|symbol) => {

  function on(listener: EventBusListener) {
    const listeners = _getListeners();
    listeners.add(listener)

    _saveListeners(listeners);
  }

  function off(listener: EventBusListener) {
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

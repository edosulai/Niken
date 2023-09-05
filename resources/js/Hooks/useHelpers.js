import HelpersContext from '@/Contexts/HelpersContext'
import { useContext } from 'react'

export function range(start, stop, step) {
  // Jika hanya diberikan satu argumen, artinya argumen tersebut adalah nilai stop dan nilai start adalah 0
  if (stop === undefined) {
    stop = start
    start = 0
  }

  // Jika hanya diberikan dua argumen, artinya argumen tersebut adalah nilai start dan stop, dan nilai step adalah 1
  if (step === undefined) step = 1
  let result = []
  for (let i = start; i < stop; i += step) result.push(i)
  return result
}

export function asset(url) {
  const { helpers, setHelpers } = useContext(HelpersContext)
  return helpers.assetUrl + url
}

export function url(url) {
  return window.location.origin + url
}

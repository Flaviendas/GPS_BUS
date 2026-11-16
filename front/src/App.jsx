import { useEffect, useState } from 'react'

function App() {
  const [arrets, setArrets] = useState([])

  useEffect(() => {
    fetch('http://localhost/GPS_BUS/public/api-arrets.php')
      .then((response) => response.json())
      .then((data) => setArrets(data))
  }, [])

  return (
    <ul>
      {arrets.map((arret) => (
        <li key={arret.id}>{arret.nom}</li>
      ))}
    </ul>
  )
}

export default App
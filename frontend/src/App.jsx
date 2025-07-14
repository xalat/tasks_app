import React from 'react'
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import ProjectsList from './components/projects/ProjectsList';

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<ProjectsList />} />
                {/* Add other routes here */}
            </Routes>
        </Router>
    );
}

export default App;

